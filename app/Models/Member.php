<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'User_Info';
    protected $primaryKey = 'member_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; 

    
    protected $fillable = [
        'member_id', 
        'Name', 
        'FatherName',  
        'MotherName',  
        'SpouseName',  
        'PerAddress',  
        'MailAddress',  
        'PhoneNumber',  
        'EMail',  
        'DateOfBirth',  
        'NID',  
        'Date',
        'Occupation',  
        'EducationalQualification',  
        'MemberOfAkhondomondoli',  
        'AddressOfAkhondomondoli',  
        'VerifiedBy',  
        'image',  
        'signature',
        'CurrentAmount'
    ];

    // protected $attributes = [
    //     'CurrentAmount' => 0,
    // ];
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('' . $this->image) : null;
    }
    // Accessor to get the signature URL
    public function getSignatureUrlAttribute()
    {
        return $this->signature ? asset('' . $this->signature) : null;
    }
    public function transections()
{
    return $this->hasMany(TransectionProfile::class, 'Member_ID', 'Member_ID');
}


}
