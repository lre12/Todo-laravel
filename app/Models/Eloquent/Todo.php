<?php


namespace App\Models\Eloquent;

use Core\Entities\Todo as TodoEntity;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property string title
 * @property string desc
 * @property bool is_complete
 * @property int id
 */
class Todo extends Model
{
    protected $fillable
        = [
            'user_id',
            'title',
            'desc',
            'is_complete'
        ];

    protected $hidden
        = [

        ];

    public function toEntity():TodoEntity
    {
        $todo = new TodoEntity();

        return $todo->setId($this->id)
            ->setTitle($this->title)
            ->setDesc($this->desc)
            ->setUserId($this->user_id)
            ->setIsComplete($this->is_complete);

    }
}
