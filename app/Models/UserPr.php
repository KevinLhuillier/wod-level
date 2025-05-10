<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPr extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_pr';

    // Indique que la clé primaire est composite
    protected $primaryKey = ['user_id', 'skill_id'];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'skill_id',
        'pr_data',
        'updated_at',
    ];

    /**
     * The "type" of the primary key.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Surcharge pour gérer les clés composites.
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();

        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $key) {
            $query->where($key, '=', $this->getAttribute($key));
        }

        return $query;
    }

    /**
     * Retourne les noms des clés primaires.
     */
    public function getKeyName()
    {
        return ['user_id', 'skill_id'];
    }

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Skill model.
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
