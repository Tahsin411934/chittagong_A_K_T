<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;
protected $table = 'Nominee';
public $timestamps = false; 
    protected $fillable = [
        'Member_ID', 'Name', 'Age', 'Address', 'Relation', 'Percentage', 'Image', 'Signature'
    ];

    public function member()
    {
        // Assuming 'Member_ID' is both the foreign key in 'Nominee' and primary key in 'Member'
        return $this->belongsTo(Member::class, 'Member_ID', 'Member_ID');
    }
}
