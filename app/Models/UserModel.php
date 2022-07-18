<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_ktp',
        'phone_number',
        'date_birth',
        'gender',
        'role',
        'photo',
    ];

    /**
     * Function to get all the data for the login information.
     *
     * @param $username
     * @param $password
     * @return array
     */
    public function getLoginData($username, $password): array
    {
        $result = [];
        $wheres = [];
        $wheres[] = "(us.email = '" . $username . "')";
        $wheres[] = '(us.deleted_at IS NULL)';
        $strWhere = ' WHERE ' . implode(' AND ', $wheres);
        $query = 'SELECT us.id_user, us.name, us.email, us.password,
                    us.role, us.phone_number, us.date_birth, us.gender,
                    us.no_ktp, us.photo, us.deleted_at
                    FROM users as us ' . $strWhere;
        $sqlResult = DB::select($query);
        if (count($sqlResult) === 1) {
            $arrData = $sqlResult[0];
            if (Hash::check($password, $arrData->password) === true) {
                $result = [
                    'id_user' => $arrData->id_user,
                    'name' => $arrData->name,
                    'email' => $arrData->email,
                    'password' => $arrData->password,
                    'role' => $arrData->role,
                    'phone_number' => $arrData->phone_number,
                    'date_birth' => $arrData->date_birth,
                    'gender' => $arrData->gender,
                    'no_ktp' => $arrData->no_ktp,
                    'photo' => $arrData->photo,
                ];
            }
        }
        return $result;
    }

    public function getLoginDataByName($name): array
    {
        $wheres = [];
        $wheres[] = "(us.name = '" . $name . "')";
        $wheres[] = "(us.role = 'admin')";
        $wheres[] = '(us.deleted_at IS NULL)';
        $strWhere = ' WHERE ' . implode(' AND ', $wheres);
        $query = 'SELECT us.id_user, us.name, us.email,
                    us.role, us.deleted_at
                    FROM users as us ' . $strWhere;
        return DB::select($query);
    }

    private static function queryAll()
    {
        $query = DB::table('users', 'us')
            ->selectRaw("us.id_user, us.name, us.email, us.password,
                    us.role, us.phone_number, us.date_birth, us.gender,
                    us.no_ktp, us.photo, us.deleted_at");
        return $query;
    }

    public static function getAll()
    {
        $query = self::queryAll();
        $query->whereNull('us.deleted_at');
        $query->orderBy('us.created_at', 'DESC');

        return $query->get();

    }
}
