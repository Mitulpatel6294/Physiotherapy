<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    protected $fillable = ['subject', 'message', 'sent_by', 'sent_at'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }
}
