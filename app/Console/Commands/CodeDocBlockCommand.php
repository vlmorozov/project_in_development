<?php


namespace App\Console\Commands;


use App\Presenters\Presenter;
use Barryvdh\Reflection\DocBlock;
use Barryvdh\Reflection\DocBlock\Context;
use Barryvdh\Reflection\DocBlock\Serializer;
use Barryvdh\Reflection\DocBlock\Tag;
use Exception;
use File;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;
use Symfony\Component\Finder\SplFileInfo;


class CodeDocBlockCommand extends Command
{
    public $signature = 'code:presenters';

    public $description = 'Генерирует документацию к классам презентеров';


    public function handle()
    {
        $folders = config('code.presenters');

        foreach ($folders as $folder) {
            /** @var SplFileInfo[] $files */
            $files = File::allFiles(base_path($folder));
            $content = null;

            foreach ($files as $file) {
                $contents = $this->generateContents($file);
                if (! $contents) {
                    continue;
                }

                File::put($file->getPath() . '/' . $file->getFilename(), $contents);
            }
        }
    }


    /**
     * @param SplFileInfo $file
     *
     * @return null|ReflectionClass
     */
    protected function getReflectionClass($file)
    {
        $declared = get_declared_classes();
        try {
            include_once $file;

            $classes = get_declared_classes();
            if (count($declared) == count($classes)) {
                return null;
            }

            $class = end($classes);
            $reflection = new ReflectionClass($class);

            return $reflection;
        } catch (Exception $e) {
            return null;
        }
    }


    /**
     * @param null|ReflectionClass $reflection
     *
     * @return bool
     */
    protected function needGenerate(ReflectionClass $reflection = null): bool
    {
        if (! $reflection) {
            return false;
        }

        if (! $reflection->isInstantiable()) {
            return false;
        }

        if (! $reflection->isSubclassOf(Presenter::class)) {
            return false;
        }

        return true;
    }


    /**
     * @param ReflectionMethod $method
     * @param Collection       $imports
     * @param DocBlock         $doc
     */
    protected function appendMethodTag($method, $imports, $doc)
    {
        $name = lcfirst(Str::substr($method->getName(), 9));
        $parameters = $method->getParameters();

        $types = collect();
        foreach ($parameters as $i => $parameter) {
            $type = (string) $parameter->getType();
            $default = $parameter->isDefaultValueAvailable() ? " = {$parameter->getDefaultValue()}" : '';

            if (! $type) {
                $types->push("\${$parameter->getName()}{$default}");
                continue;
            }

            $imports->push($type);
            $typings = $i === 0 ? $this->typeVariants($type)->implode(' | ') : class_basename($type);
            $types->push("{$typings} \${$parameter->getName()}{$default}");
        }

        $doc->appendTag(Tag::createInstance("@method array {$name}({$types->implode(', ')})", $doc));
    }


    /**
     * @param string $type
     *
     * @return Collection
     */
    protected function typeVariants(string $type): Collection
    {
        $type_variants = [];
        $type_variants[] = class_basename($type);
        $type_variants[] = class_basename($type) . '[] ';
        $type_variants[] = class_basename(Collection::class);

        return collect($type_variants);
    }


    /**
     * @param string     $contents
     * @param Collection $imports
     *
     * @return string
     */
    protected function replaceImports(string $contents, Collection $imports): string
    {
        preg_match_all('/use (?P<uses>[^;]+);$(?=.*^class)/ms', $contents, $matches);
        $imports = $imports->merge(array_get($matches, 'uses', []))->unique()->toArray();
        sort($imports);

        $pos = strpos($contents, 'use ');
        if ($pos) {
            $imports = array_map(function ($import) {
                return "use {$import};";
            }, $imports);

            $contents = preg_replace("/use [^;]+;$(?=.*^class)\n/ms", '', $contents);
            $contents = substr($contents, 0, $pos) . implode(PHP_EOL, $imports) . substr($contents, $pos - 1);
        }

        return $contents;
    }


    /**
     * @param string   $original_doc
     * @param DocBlock $doc
     * @param string   $contents
     * @param string   $base_class
     *
     * @return string
     */
    protected function replaceDocBlock(string $original_doc, DocBlock $doc, string $contents, string $base_class): string
    {
        $serializer = new Serializer();
        $new_doc = $serializer->getDocComment($doc);

        if ($original_doc) {
            $contents = str_replace($original_doc, $new_doc, $contents);
        } else {
            $needle = "class {$base_class}";
            $replace = "{$new_doc}\nclass {$base_class}";
            $pos = strpos($contents, $needle);
            if ($pos !== false) {
                $contents = substr_replace($contents, $replace, $pos, strlen($needle));
            }
        }

        return $contents;
    }


    /**
     * @param string $contents
     *
     * @return string
     */
    protected function clean(string $contents): string
    {
        return preg_replace("/\n\n\n\n/", "\n\n\n", $contents);
    }


    /**
     * @param SplFileInfo $file
     *
     * @return null|string
     */
    protected function generateContents($file)
    {
        $reflection = $this->getReflectionClass($file);

        if (! $this->needGenerate($reflection)) {
            return null;
        }

        $this->info("Обработка файла {$file->getFilename()}");

        $methods = $reflection->getMethods();
        $original_doc = $reflection->getDocComment();
        $base_class = class_basename($reflection->getName());

        $doc = new DocBlock("Class {$base_class}", new Context($reflection->getNamespaceName()));

        $imports = collect([Collection::class]);

        foreach ($methods as $method) {
            if (Str::startsWith($method->getName(), 'transform')) {
                $this->appendMethodTag($method, $imports, $doc);
            }
        }

        $contents = $file->getContents();
        $contents = $this->replaceImports($contents, $imports);
        $contents = $this->replaceDocBlock($original_doc, $doc, $contents, $base_class);

        $contents = $this->clean($contents);

        return $contents;
    }
}
