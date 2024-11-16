<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status']; // Make sure this is set
    protected $table = 'login_requests';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
