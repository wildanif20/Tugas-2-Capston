<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class job_postings extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'employer_id',
        'judul_pekerjaan',
        'deskripsi',
        'kisaran_gaji',
        'tanggal_posting',
        'tanggal_hingga',
    ];

    public static function findById($employer_id)
    {
        return self::where('employer_id', $employer_id)->first();
    }
}
