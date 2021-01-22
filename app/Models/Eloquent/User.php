<?php


namespace App\Models\Eloquent;

use Core\Entities\User as UserEntity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Eloquent\User
 *
 * @property integer $id
 * @property string $name
 * @property string $password
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    protected $fillable
        = [
            'name',
            'password'
        ];

    protected $hidden
        = [
            'password',
        ];

    public function toEntity(): UserEntity
    {
        $user = new UserEntity();

        return $user->setId($this->id)
            ->setName($this->name)
            ->setPassword($this->password);

    }

}

