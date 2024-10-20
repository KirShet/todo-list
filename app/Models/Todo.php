<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $quarded = ['id'];

    protected $fillable = ['name'];
    
    //Дайте мне задачу которая пиринадлежить этому конкретному пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
        // Эта функция устанавливает связь типа "принадлежит" (belongsTo) между текущей моделью и связанной моделью в Eloquent ORM, используя ключи для определения отношения.
    }
}
