<?php
namespace App\Providers;
use App\Post;
use App\Repositories\Contract\CategoryRepositoryInterface;
use App\Repositories\Contract\CommentRepositoryInterface;
use App\Repositories\Contract\PostRepositoryInterface;
use App\Repositories\Contract\RepositoryInterface;
use App\Repositories\Contract\UserRepositoryInterface;
use App\Repositories\Eloquent\CategoryEloquentRepository;
use App\Repositories\Eloquent\CommentEloquentRepository;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\PostEloquentRepository;
use App\Repositories\Eloquent\UserEloquentRepository;
use App\Service\CategoryServiceInterface;
use App\Service\CommentServiceInterface;
use App\Service\Impl\CategoryService;
use App\Service\Impl\CommentService;
use App\Service\Impl\PostService;
use App\Service\Impl\UserService;
use App\Service\PostServiceInterface;
use App\Service\ServiceInterface;
use App\Service\UserServiceInterface;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            RepositoryInterface::class,
            EloquentRepository::class
        );
        $this->app->singleton(
            PostRepositoryInterface::class,
            PostEloquentRepository::class
        );
        $this->app->singleton(
            PostServiceInterface::class,
            PostService::class
        );
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryEloquentRepository::class
        );
        $this->app->singleton(
            CategoryServiceInterface::class,
            CategoryService::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserEloquentRepository::class
        );
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
        );
        $this->app->singleton(
            CommentRepositoryInterface::class,
            CommentEloquentRepository::class
        );
        $this->app->singleton(
            CommentServiceInterface::class,
            CommentService::class
        );
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('page.index',function ($view){

          $posts=Post::where('mode','public')->orderBy('created_at','desc')->paginate(4);
          $view->with('posts',$posts);
      });
        view()->composer('page.index',function ($view){
            $postNewest=Post::where('mode','public')->orderBy('updated_at','desc')->first();
            $view->with('postNewest',$postNewest);
        });
        view()->composer('page.users.myPost',function ($view){
            $tags=Tag::all();
            $view->with('tags',$tags);
        });
    }
}

