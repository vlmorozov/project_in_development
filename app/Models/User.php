<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;


/**
 * App\User
 *
 * @mixin \Eloquent
 * @property int                                                        $id
 * @property int|null                                                   $contractor_contact_id ID контактного лица контрагента
 * @property string                                                     $name                  ФИО сотрудника
 * @property string                                                     $login                 Логин
 * @property string                                                     $password              Пароль
 * @property string|null                                                $personnel_number      Табельный номер
 * @property string|null                                                $status                1-активен, 2-неактиване
 * @property int|null                                                   $company_id            ID компании
 * @property int|null                                                   $company_unit_id       ID подразделения компании
 * @property int|null                                                   $position_id           ID должности
 * @property string|null                                                $date_birth            Дата рождения
 * @property string|null                                                $date_hire             Дата приема на работу
 * @property string|null                                                $date_dismissal        Дата увольнения
 * @property string|null                                                $phone_work            Телефон рабочий
 * @property string|null                                                $phone_work_add        Телефон рабочий доб.
 * @property string|null                                                $phone_add             Телефон доб. 2
 * @property string|null                                                $phone_mobile          Телефон мобильный
 * @property string|null                                                $phone_home            Телефон домашний
 * @property string|null                                                $email_personal        Email личный
 * @property string|null                                                $email_work            Email рабочий
 * @property int                                                        $import_1c             Импортирован из 1С
 * @property int                                                        $can_auth              Может авторизоваться через веб
 * @property int                                                        $can_auth_tab          Может авторизоваться с планшета
 * @property int                                                        $can_auth_report       Может авторизоваться в системе отчетов
 * @property int|null                                                   $can_auth_lk           Может авторизоваться в личном кабинете
 * @property int|null                                                   $can_auth_mlk          Может авторизоваться в мобильном личном кабинете
 * @property int                                                        $is_admin              Администратор
 * @property string|null                                                $mail_signature        Подпись при отправке писем
 * @property string|null                                                $forgot_code           Код для восстановления пароля
 * @property int                                                        $is_load_call          Загружать звонки
 * @property int                                                        $can_access_child
 * @property string|null                                                $source                Признак учета
 * @property string|null                                                $password2             Пароль для расшифровки
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read Company|null                                          $company
 * @property-read Department                                            $department
 * @property-read Position|null                                         $position
 * @method static Builder|User whereCanAccessChild($value)
 * @method static Builder|User whereCanAuth($value)
 * @method static Builder|User whereCanAuthLk($value)
 * @method static Builder|User whereCanAuthMlk($value)
 * @method static Builder|User whereCanAuthReport($value)
 * @method static Builder|User whereCanAuthTab($value)
 * @method static Builder|User whereCompanyId($value)
 * @method static Builder|User whereCompanyUnitId($value)
 * @method static Builder|User whereContractorContactId($value)
 * @method static Builder|User whereDateBirth($value)
 * @method static Builder|User whereDateDismissal($value)
 * @method static Builder|User whereDateHire($value)
 * @method static Builder|User whereEmailPersonal($value)
 * @method static Builder|User whereEmailWork($value)
 * @method static Builder|User whereForgotCode($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereImport1c($value)
 * @method static Builder|User whereIsAdmin($value)
 * @method static Builder|User whereIsLoadCall($value)
 * @method static Builder|User whereLogin($value)
 * @method static Builder|User whereMailSignature($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePassword2($value)
 * @method static Builder|User wherePersonnelNumber($value)
 * @method static Builder|User wherePhoneAdd($value)
 * @method static Builder|User wherePhoneHome($value)
 * @method static Builder|User wherePhoneMobile($value)
 * @method static Builder|User wherePhoneWork($value)
 * @method static Builder|User wherePhoneWorkAdd($value)
 * @method static Builder|User wherePositionId($value)
 * @method static Builder|User whereSource($value)
 * @method static Builder|User whereStatus($value)
 * @property-read \App\Models\Driver $driver
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'password',
        'company_id',
        'company_unit_id',
        'position_id',
        'personnel_number',
        'source',
        'date_birth',
        'date_hire',
        'date_dismissal',
        'phone_work',
        'phone_work_add',
        'phone_add',
        'phone_mobile',
        'email_work',
        'is_load_call',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'status' => 'integer',
        'is_load_call' => 'boolean',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'company_unit_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }


    public function driver()
    {
        return $this->hasOne(Driver::class);
    }


    public function setMailSignatureAttribute($value)
    {
        $hasSignature = (bool) $value;

        if ($hasSignature) {
            $this->attributes['mail_signature'] = view('mail.signature', ['user' => $this]);
        } else {
            $this->attributes['mail_signature'] = null;
        }
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = md5($value);
    }
}
