<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class Admin extends User
{

	protected $table = 'admins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cpf', 'matricula',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function questoes()
    {
        return $this->belongsToMany('App\Models\Questao');
    }

    public static function validarCPF($cpf)
    {
        $sql = DB::select("select * from admins where cpf = ?", array($cpf));
        if($sql)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function validarEmail($email)
    {
        $sql = DB::select("select * from admins where email = ?", array($email));
        if($sql)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function  mediaAluno()
    {

        $media = DB::table('aluno_resultado')
                     ->select(DB::raw('year(created_at) as ano, month(created_at) as mes, avg(nota) as y'))
                     ->groupBy(DB::raw('year(created_at), month(created_at)'))
                     ->get();       

        if(empty($media))
        {
            return 0;    
        }
        else
        {
            return $media;
        }
        
    }
}
