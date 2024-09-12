<?php

namespace Corcel\Model;
use Corcel\Concerns\Aliases;

use Corcel\Model;
use Exception;

/**
 * Blog class.
 *
 * @package Corcel\Model
 * @author José CI <josec89@gmail.com>
 * @author Junior Grossi <juniorgro@gmail.com>
 * @author Brede Basualdo <hola@brede.cl>
 */
class Blog extends Model
{
    use Aliases;
    /**
     * @var string
     */
    protected $table = 'blogs';
    

    /**
     * @var string
     */
    protected $primaryKey = 'blog_id';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'domain',
        'path',
        'public',
        'archived',
        'mature',
        'spam',
        'deleted',
        'lang_id',
    ];
    protected $appends = [
        'id',];
    protected static $aliases = [
        'id' => 'blog_id',
    ];
    public function options(){
        
        if ($this->id == 1) {
            \Corcel\Database::connect(config('database.connections'));
            return Option::all();
            
        } else {
            \Corcel\Database::connectSite(config('database.connections'), $this->id);
            return Blogoption::all();
        }
        
    }

}
