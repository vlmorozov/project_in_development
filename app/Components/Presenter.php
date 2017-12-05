<?php

namespace App\Presenters;


use Illuminate\Support\Collection;


class Presenter
{
    public function __call($name, $args)
    {
        $value = array_shift($args);
        if ($value === null) {
            return null;
        }

        $extend = null;
        if (count($args)) {
            $last = $args[count($args) - 1];
            if ($last instanceof \Closure) {
                $extend = array_pop($args);
            }
        }

        $transform = 'transform'.ucfirst($name);
        if (!method_exists($this, $transform)) {
            throw new \Exception('Presenter '.static::class.' doesn\'t have method '.$name);
        }

        if ($value instanceof Collection) {
            $value = $value->all();
        }

        if (is_array($value)) {
            return array_values(array_map(function($model) use ($transform, $args, $extend) {
                $result = $this->$transform($model, ...$args);
                return $extend ? $extend($result, $model, ...$args) : $result;
            }, $value));
        } else {
            $result = $this->$transform($value, ...$args);
            return $extend ? $extend($result, $value, ...$args) : $result;
        }
    }
}
