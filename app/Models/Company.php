<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Company
 *
 * @property int $id
 * @property string|null $title название организации
 * @property string|null $title_full краткое название организации
 * @property string|null $title_short краткое обозначение (для договоров)
 * @property string|null $prefix префикс
 * @property string|null $type тип (1 - юр.лицо, 2 - физ.лицо, 3 - ИП)
 * @property int|null $okpfo_type_id ID ОПФ
 * @property string|null $inn ИНН
 * @property string|null $kpp КПП
 * @property string|null $ogrn ОГРН
 * @property string|null $okpo ОКПО
 * @property string|null $status 1-активен, 2-неактиване
 * @property string|null $ur_address_text Юридический адрес
 * @property string|null $ur_address_fias Юридический адрес
 * @property string|null $ur_address_json Юридический адрес
 * @property string|null $post_address_text Почтовый адрес
 * @property string|null $post_address_fias Почтовый адрес
 * @property string|null $post_address_json Почтовый адрес
 * @property string|null $fact_address_text Фактический адрес
 * @property string|null $fact_address_fias Фактический адрес
 * @property string|null $fact_address_json Фактический адрес
 * @property string|null $phone Телефон
 * @property string|null $fax Факс
 * @property string|null $email E-mail
 * @property string|null $url Сайт
 * @property string|null $advertising_text Рекламный текст
 * @property int|null $logo_file_id ID файла с логотипом компании
 * @property int|null $main_company_requisite_id ID основного счета
 * @property int $for_internal_use Для внутреннего использования
 * @property string|null $scan_stamp_file_id
 * @method static Builder|Company whereAdvertisingText($value)
 * @method static Builder|Company whereEmail($value)
 * @method static Builder|Company whereFactAddressFias($value)
 * @method static Builder|Company whereFactAddressJson($value)
 * @method static Builder|Company whereFactAddressText($value)
 * @method static Builder|Company whereFax($value)
 * @method static Builder|Company whereForInternalUse($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereInn($value)
 * @method static Builder|Company whereKpp($value)
 * @method static Builder|Company whereLogoFileId($value)
 * @method static Builder|Company whereMainCompanyRequisiteId($value)
 * @method static Builder|Company whereOgrn($value)
 * @method static Builder|Company whereOkpfoTypeId($value)
 * @method static Builder|Company whereOkpo($value)
 * @method static Builder|Company wherePhone($value)
 * @method static Builder|Company wherePostAddressFias($value)
 * @method static Builder|Company wherePostAddressJson($value)
 * @method static Builder|Company wherePostAddressText($value)
 * @method static Builder|Company wherePrefix($value)
 * @method static Builder|Company whereScanStampFileId($value)
 * @method static Builder|Company whereStatus($value)
 * @method static Builder|Company whereTitle($value)
 * @method static Builder|Company whereTitleFull($value)
 * @method static Builder|Company whereTitleShort($value)
 * @method static Builder|Company whereType($value)
 * @method static Builder|Company whereUrAddressFias($value)
 * @method static Builder|Company whereUrAddressJson($value)
 * @method static Builder|Company whereUrAddressText($value)
 * @method static Builder|Company whereUrl($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    protected $table = 'company';
    public $timestamps = false;
    protected $casts = [
        'status' => 'integer',
    ];
}
