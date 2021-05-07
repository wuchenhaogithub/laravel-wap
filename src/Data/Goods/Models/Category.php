<?php

namespace Wuchenhao\LaravelShop\Data\Goods\Models;


class Category extends Model
{
    protected $fillable = ['name', 'is_root', 'level', 'pid', 'path'];

    public function parent(){
        return $this->belongsTo(self::class,'pid');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'pid');
    }

    public function getPathsAttribute(){
        return $this->path.$this->id;
    }

    //获取所有祖先类目的 ID 值
    public function getPathIdsAttribute(){
        return array_filter(explode('-', trim($this->path, '-')));
    }

    //获取所有祖先类目并按层级排序
    public function getAncestorsAttribute()
    {
        return Category::query()
            ->whereIn('id', $this->path_ids)
            ->orderBy('level')
            ->get();
    }
    public function getChildrensAttribute()
    {
        return Category::query()
            ->where('path', 'like', $this->paths.'%')
            ->orderBy('level')
            ->get();
    }

    // 获取以 - 为分隔的所有祖先类目名称以及当前类目的名称
    public function getFullNameAttribute()
    {
        return $this->ancestors  // 获取所有祖先类目
        ->pluck('name') // 取出所有祖先类目的 name 字段作为一个数组
        ->push($this->name) // 将当前类目的 name 字段值加到数组的末尾
        ->implode('-'); // 用 - 符号将数组的值组装成一个字符串
    }

    public function test()
    {

        // 如果需要添加一个分类,用户会自己填写 path,level
        // 需要一个事件监听Category创建的之前的动作
//        $model = Category::create([
//            "name"=>1,
//            'pid'=>2,
//            'is_root'
//        ]);
//        $model = Category::query()->find(6);
//        $model->name = "笔记本1";
//        return $model->save();

        //批量更新方法 没有触发事件，查看源码 查询update方法
        /**
         * 批量修改update 不触发update事件， Illuminate\Database\Eloquent/Builder::update()
         * 修改update  添加触发事件
            if ($this->model->fireModelEvent('updating') === false) {
             return false;
            }
            $return = $this->toBase()->update($this->addUpdatedAtColumn($values));
            $this->model->fireModelEvent('updated', false);
            return  $return;
         *
         * 需修改 fireModelEvent 方法属性 改为 public @ Illuminate\Database\Eloquent\Concerns/HasEvents::fireModelEvent();
         */


        return Category::where('id',6)->update(['name'=>'笔记本1']);



//        return Category::where('id', 2)->first()->children;
    }
}
