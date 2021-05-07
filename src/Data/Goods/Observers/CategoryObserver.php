<?php

namespace Wuchenhao\LaravelShop\Data\Goods\Observers;

use Wuchenhao\LaravelShop\Data\Goods\Models\Category;

class CategoryObserver
{

    // 这是在Category创建的时候执行
    public function creating  (Category $category)
    {
        //如果创建的是一个根类目
        if(is_null($category->pid) || $category->pid == 0){
            //将层级设为0
            $category->level=0;
            //将path设为-
            $category->path = '-';
        }else{
            //将层级设为父类目的层级+1
            $category->level = $category->parent->level+1;
            //将path值设为父类目的path 追加父类目ID以及最后跟上一个-分隔符
            $category->path =$category->parent->path.$category->pid.'-';
        }
    }


    /**
     * Handle the category "created" event.
     *
     * @param  \Wuchenhao\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        dd('created');
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \Wuchenhao\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        dd('updated');
    }

    public function updating(Category $category)
    {
        dd('updating');
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \Wuchenhao\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        dd('deleted');
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \Wuchenhao\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        dd('restored');
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \Wuchenhao\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        dd('forceDeleted');
    }
}
