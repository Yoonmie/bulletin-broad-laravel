## Laravel Blog Project
- [Posts](#posts/PostList)
- [User](#user/UserList)
- [Login](#Login)

## Installation

```
- git clone https://github.com/Yoonmie/laracasts_blog.git
- cd laracasts_blog
- composer install
- cp .env.example .env
- create database
- php artisan key:generate
- php artisan migrate
- php artisan serve
```

## Project Flow 
- Can access all the posts
- Can access the posts with individual user
- Can access userlist

## Admin Site
- Can access all the posts
- Can access the posts with individual user
- Can access userlist

## Admin Site
- Can access the posts with individual user

## Login
In this page, users can can loginto with the registered username and password. If user is admin, user can access all the posts. If not, they can only access the post that is related to the loggedin user.

## Post
In this page, only admin can access all the posts. User can only access the indiviual user post. All users can create, update and delete the posts.

## User
In this page, only admin can access the user list. Admin can create, update and delete the user data.






