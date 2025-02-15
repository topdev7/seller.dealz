<?php

namespace App\Models\Quizzes\Result;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

/**
 * Class Answer
 *
 * @package App\Models\Result
 *
 * @property string $id          Unique ID generated by the system on creation.
 * @property string $choice_id   Choice ID
 * @property string $choice_name The answer of the question.
 * @property string $question_id The Question ID.
 * @property int    $ordering    The sort order.
 * @property string $letter      Assigned letter.
 *
 * @method static Answer find(int $id)
 * @method static Answer findOrFail(int $id)
 * @method static Answer first()
 *
 * @method static QueryBuilder|Answer ofQuestion(string $id)
 */
class Answer extends Model
{

    const PATH = '';
    const SLUG = 'answer';

    protected $table = 'quizzes_results_answers';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'letter',
        'choice',
        'ordering',
    ];

    protected $hidden = [
        'question_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Scope a query to specify sections of a given Question ID.
     *
     * @param  QueryBuilder $query
     * @param  string       $question_id
     *
     * @return QueryBuilder
     */
    public function scopeOfQuestion($query, $question_id)
    {
        return $query->where('question_id', '=', $question_id);
    }
}