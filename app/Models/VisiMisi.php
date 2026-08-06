<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     * Secara default Laravel akan menganggap tabelnya bernama 'visi_misis'.
     *
     * @var string
     */
    protected $table = 'visi_misis';

    /**
     * Kolom yang dapat diisi secara massal (Mass Assignment).
     * Pastikan kolom ini sama dengan yang ada di file Migration Anda.
     *
     * @var array
     */
    protected $fillable = [
        'visi',
        'misi',
    ];

    /**
     * Jika Anda ingin menonaktifkan fitur timestamps (created_at & updated_at),
     * Anda bisa mengubahnya menjadi false. Namun disarankan tetap true.
     *
     * @var bool
     */
    public $timestamps = true;
}