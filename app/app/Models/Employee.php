<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Varsayılan olarak Laravel, tablonun adını modelin çoğul hali olarak kabul eder.
    // Örneğin, `Employee` modeli için `employees` tablosunu kullanır.

    protected $fillable = ['name', 'email'];

    // Bir çalışanın görevleriyle olan ilişkisini tanımlıyoruz.
    public function tasks()
    {
        return $this->hasMany(Task::class);  // Çalışan, birden fazla göreve sahip olabilir
    }
}
