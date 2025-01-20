<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Auth{
/**
 * App\Models\Auth\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $title
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Auth\Role> $roles
 * @method static \Illuminate\Database\Eloquent\Builder|Permission action($action = 'read')
 * @method static \Illuminate\Database\Eloquent\Builder|Permission collect($sort = 'display_name')
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission usingSearchString($string)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\Role
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string|null $description
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $line_actions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Auth\Permission> $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|Role collect($sort = 'display_name')
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Role usingSearchString($string)
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $last_logged_in_at
 * @property string $locale
 * @property string|null $landing_page
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Common\Company> $companies
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Dashboard> $dashboards
 * @property-read mixed $last_logged
 * @property-read array $line_actions
 * @property-read mixed $picture
 * @property-read \App\Models\Auth\UserInvitation|null $invitation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Media> $media
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Auth\Permission> $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Auth\Role> $roles
 * @method static \Plank\Mediable\MediableCollection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|User collect($sort = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|User email($email)
 * @method static \Illuminate\Database\Eloquent\Builder|User enabled()
 * @method static \Database\Factories\User factory($count = null, $state = [])
 * @method static \Plank\Mediable\MediableCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|User isCustomer()
 * @method static \Illuminate\Database\Eloquent\Builder|User isEmployee()
 * @method static \Illuminate\Database\Eloquent\Builder|User isNotCustomer()
 * @method static \Illuminate\Database\Eloquent\Builder|User isNotEmployee()
 * @method static \Illuminate\Database\Eloquent\Builder|User isNotOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|User isOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User source($source)
 * @method static \Illuminate\Database\Eloquent\Builder|User usingSearchString($string)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHavePermission()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHaveRole()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHasMediaMatchAll(array $tags)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User withMediaAndVariantsMatchAll($tags = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Translation\HasLocalePreference {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\UserCompany
 *
 * @property int $user_id
 * @property int $company_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompany onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompany withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompany withoutTrashed()
 */
	class UserCompany extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\UserDashboard
 *
 * @property int $user_id
 * @property int $dashboard_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Dashboard|null $dashboard
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Dashboard> $dashboards
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDashboard onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDashboard withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDashboard withoutTrashed()
 */
	class UserDashboard extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\UserInvitation
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInvitation onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation token($token)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserInvitation truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInvitation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInvitation withoutTrashed()
 */
	class UserInvitation extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\UserRole
 *
 * @property int $user_id
 * @property int $role_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\Role $role
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserRole truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole withoutTrashed()
 */
	class UserRole extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Account
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $name
 * @property string $number
 * @property string $currency_code
 * @property float $opening_balance
 * @property string|null $bank_name
 * @property string|null $bank_phone
 * @property string|null $bank_address
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read string $balance
 * @property-read string $expense_balance
 * @property-read string $income_balance
 * @property-read mixed $initials
 * @property-read array $line_actions
 * @property-read string $title
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Banking\Reconciliation> $reconciliations
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transaction> $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account exists()
 * @method static \Database\Factories\Account factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account number($number)
 * @method static \Illuminate\Database\Eloquent\Builder|Account onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Account withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Account withoutTrashed()
 */
	class Account extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Reconciliation
 *
 * @property int $id
 * @property int $company_id
 * @property int $account_id
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon $ended_at
 * @property float $closing_balance
 * @property array|null $transactions
 * @property bool $reconciled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Banking\Account|null $account
 * @property-read \App\Models\Common\Company|null $company
 * @property-read array $line_actions
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation exists()
 * @method static \Database\Factories\Reconciliation factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reconciliation onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Reconciliation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Reconciliation withoutTrashed()
 */
	class Reconciliation extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Transaction
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $number
 * @property \Illuminate\Support\Carbon $paid_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $account_id
 * @property int|null $document_id
 * @property int|null $contact_id
 * @property int $category_id
 * @property string|null $description
 * @property string $payment_method
 * @property string|null $reference
 * @property int $parent_id
 * @property int|null $split_id
 * @property int $reconciled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Banking\Account|null $account
 * @property-read \App\Models\Document\Document|null $bill
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \Plank\Mediable\MediableCollection<int, Transaction> $children
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \App\Models\Document\Document|null $document
 * @property-read string $amount_before_tax
 * @property-read float $amount_for_account
 * @property-read float $amount_for_document
 * @property-read string $attachment
 * @property-read bool $is_splittable
 * @property-read array $line_actions
 * @property-read string $recurring_status_label
 * @property-read string $route_id
 * @property-read string $route_name
 * @property-read string $tax_ids
 * @property-read string $total_tax
 * @property-read string $type_title
 * @property-read \App\Models\Document\Document|null $invoice
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Media> $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read Transaction|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Plank\Mediable\MediableCollection<int, Transaction> $splits
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Banking\TransactionTax> $taxes
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction accountId(int $account_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction categoryId(int $category_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction contactId(int $contact_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction documentId(int $document_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction expense()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction expenseRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction expenseTransfer()
 * @method static \Database\Factories\Transaction factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection<int, static> get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction income()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction incomeRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction incomeTransfer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isDocument()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotDocument()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotReconciled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotSplit()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotTransfer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isReconciled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isSplit()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isTransfer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction number(string $number)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction type($types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction withoutTrashed()
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\TransactionTax
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $transaction_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @property-read \App\Models\Banking\Transaction|null $transaction
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax expense()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax expenseRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax income()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax incomeRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransactionTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionTax withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionTax withoutTrashed()
 */
	class TransactionTax extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Transfer
 *
 * @property int $id
 * @property int $company_id
 * @property int $expense_transaction_id
 * @property int $income_transaction_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Banking\Transaction|null $expense_transaction
 * @property-read float $amount
 * @property-read string $attachment
 * @property-read string $description
 * @property-read int $from_account_id
 * @property-read string $from_account_rate
 * @property-read string $from_currency_code
 * @property-read array $line_actions
 * @property-read string $payment_method
 * @property-read string $reference
 * @property-read mixed $template_path
 * @property-read int $to_account_id
 * @property-read string $to_account_rate
 * @property-read string $to_currency_code
 * @property-read \App\Models\Banking\date $transferred_at
 * @property-read \App\Models\Banking\Transaction|null $income_transaction
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Media> $media
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer exists()
 * @method static \Database\Factories\Transfer factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection<int, static> get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer withoutTrashed()
 */
	class Transfer extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Company
 *
 * @property int $id
 * @property string|null $domain
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Banking\Account> $accounts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Setting\Category> $categories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\ContactPerson> $contact_persons
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Common\Contact> $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Setting\Currency> $currencies
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Dashboard> $dashboards
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentHistory> $document_histories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentItemTax> $document_item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentItem> $document_items
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentTotal> $document_totals
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Document\Document> $documents
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Setting\EmailTemplate> $email_templates
 * @property-read string $company_logo
 * @property-read array $line_actions
 * @property-read mixed $location
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\ItemTax> $item_taxes
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Common\Item> $items
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Media> $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Module\ModuleHistory> $module_histories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Module\Module> $modules
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Banking\Reconciliation> $reconciliations
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Recurring> $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Report> $reports
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Setting\Setting> $settings
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Setting\Tax> $taxes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Banking\TransactionTax> $transaction_taxes
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transaction> $transactions
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transfer> $transfers
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Auth\User> $users
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Widget> $widgets
 * @method static \Plank\Mediable\MediableCollection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Company autocomplete($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Company collect($sort = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|Company enabled($value = 1)
 * @method static \Database\Factories\Company factory($count = null, $state = [])
 * @method static \Plank\Mediable\MediableCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Company isNotOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|Company isOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Company source($source)
 * @method static \Illuminate\Database\Eloquent\Builder|Company userId($user_id)
 * @method static \Illuminate\Database\Eloquent\Builder|Company usingSearchString($string)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereHasMediaMatchAll(array $tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMediaAndVariantsMatchAll($tags = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Company withoutTrashed()
 */
	class Company extends \Eloquent implements \Laratrust\Contracts\Ownable {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Contact
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $name
 * @property string|null $email
 * @property int|null $user_id
 * @property string|null $tax_number
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $zip_code
 * @property string|null $state
 * @property string|null $country
 * @property string|null $website
 * @property string $currency_code
 * @property bool $enabled
 * @property string|null $reference
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\ContactPerson> $contact_persons
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Document\Document> $documents
 * @property-read mixed $has_email
 * @property-read mixed $initials
 * @property-read array $line_actions
 * @property-read mixed $location
 * @property-read string $logo
 * @property-read mixed $open
 * @property-read mixed $overdue
 * @property-read mixed $unpaid
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Media> $media
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transaction> $transactions
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact customer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact email($email)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact employee()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact exists()
 * @method static \Database\Factories\Contact factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection<int, static> get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact type($types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact vendor()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact withoutTrashed()
 */
	class Contact extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\ContactPerson
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $contact_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read mixed $initials
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson customer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson email($email)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson employee()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactPerson onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson type(array $types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ContactPerson vendor()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactPerson withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactPerson withoutTrashed()
 */
	class ContactPerson extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Dashboard
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read string $alias
 * @property-read array $line_actions
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Auth\User> $users
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Widget> $widgets
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard exists()
 * @method static \Database\Factories\Dashboard factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard userId($user_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard withoutTrashed()
 */
	class Dashboard extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Item
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $name
 * @property string|null $sku
 * @property string|null $description
 * @property float|null $sale_price
 * @property float|null $purchase_price
 * @property int|null $category_id
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentItem> $document_items
 * @property-read mixed $initials
 * @property-read string $item_id
 * @property-read array $line_actions
 * @property-read string $picture
 * @property-read string $tax_ids
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Media> $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\ItemTax> $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item autocomplete($filter)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item billing($billing)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item exists()
 * @method static \Database\Factories\Item factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection<int, static> get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item priceType($price_type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item type($type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\ItemTax
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property int|null $tax_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTax withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTax withoutTrashed()
 */
	class ItemTax extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Media
 *
 * @property int $id
 * @property int $company_id
 * @property string $disk
 * @property string $directory
 * @property string $filename
 * @property string $extension
 * @property string $mime_type
 * @property string $aggregate_type
 * @property int $size
 * @property string|null $variant_name
 * @property int|null $original_media_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string $basename
 * @property-read Media|null $originalMedia
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Media> $variants
 * @method static \Illuminate\Database\Eloquent\Builder|Media forPathOnDisk(string $disk, string $path)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inDirectory(string $disk, string $directory, bool $recursive = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inOrUnderDirectory(string $disk, string $directory)
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media unordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereBasename(string $basename)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsOriginal()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsVariant(?string $variant_name = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Media withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Media withoutTrashed()
 */
	class Media extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Notification
 *
 * @property string $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseNotification read()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseNotification unread()
 */
	class Notification extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Recurring
 *
 * @property int $id
 * @property int $company_id
 * @property string $recurable_type
 * @property int $recurable_id
 * @property string $frequency
 * @property int $interval
 * @property string $started_at
 * @property string $status
 * @property string $limit_by
 * @property int $limit_count
 * @property string|null $limit_date
 * @property bool $auto_send
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Document\Document> $documents
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $recurable
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transaction> $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring active()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring completed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring document($type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring ended()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring expenseTransaction()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring incomeTransaction()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recurring onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring transaction()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Recurring withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Recurring withoutTrashed()
 */
	class Recurring extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Report
 *
 * @property int $id
 * @property int $company_id
 * @property string $class
 * @property string $name
 * @property string $description
 * @property object|null $settings
 * @property int|null $created_by
 * @property string|null $created_from
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read string $alias
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Report withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Report withoutTrashed()
 */
	class Report extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Widget
 *
 * @property int $id
 * @property int $company_id
 * @property int $dashboard_id
 * @property string $class
 * @property string $name
 * @property int $sort
 * @property object $settings
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Dashboard|null $dashboard
 * @property-read string $alias
 * @property-read string $width
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Auth\User> $users
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget exists()
 * @method static \Database\Factories\Widget factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget withoutTrashed()
 */
	class Widget extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\Document
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $title
 * @property string|null $subheading
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \Plank\Mediable\MediableCollection<int, Document> $children
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property-read array $line_actions
 * @property-read string $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read string $recurring_status_label
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentHistory> $histories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentItemTax> $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentItem> $items
 * @property-read \App\Models\Document\DocumentHistory $last_history
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\Media> $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentTotal> $totals
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transaction> $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document billRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document exists()
 * @method static \Database\Factories\Document factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document future()
 * @method static \Plank\Mediable\MediableCollection<int, static> get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoiceRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Eloquent\Builder|Document onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document status(string $status)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document withoutTrashed()
 */
	class Document extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentHistory
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string $status
 * @property int $notify
 * @property string|null $description
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory billRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoiceRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory status(string $status)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentHistory withoutTrashed()
 */
	class DocumentHistory extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentItem
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int|null $item_id
 * @property string $name
 * @property string|null $description
 * @property string|null $sku
 * @property float $quantity
 * @property float $price
 * @property float $tax
 * @property string $discount_type
 * @property float $discount_rate
 * @property float $total
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read string $discount
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentItemTax> $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem billRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoiceRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentItem withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentItem withoutTrashed()
 */
	class DocumentItem extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentItemTax
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $document_item_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax billRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoiceRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentItemTax withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentItemTax withoutTrashed()
 */
	class DocumentItemTax extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentTotal
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string|null $code
 * @property string $name
 * @property float $amount
 * @property int $sort_order
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal billRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoiceRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentTotal onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentTotal withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentTotal withoutTrashed()
 */
	class DocumentTotal extends \Eloquent {}
}

namespace App\Models\Module{
/**
 * App\Models\Module\Module
 *
 * @property int $id
 * @property int $company_id
 * @property string $alias
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Module withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Module withoutTrashed()
 */
	class Module extends \Eloquent {}
}

namespace App\Models\Module{
/**
 * App\Models\Module\ModuleHistory
 *
 * @property int $id
 * @property int $company_id
 * @property int $module_id
 * @property string $version
 * @property string|null $description
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Module\Module|null $module
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleHistory withoutTrashed()
 */
	class ModuleHistory extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Category
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $type
 * @property string $color
 * @property bool $enabled
 * @property int|null $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $categories
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Document\Document> $documents
 * @property-read string $color_hex_code
 * @property-read mixed $display_name
 * @property-read array $line_actions
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Common\Item> $items
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $sub_categories
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transaction> $transactions
 * @method static \App\Builders\Category|Model account($accounts)
 * @method static \App\Builders\Category|Model allCompanies()
 * @method static \App\Builders\Category|Model collect($sort = 'name')
 * @method static \App\Builders\Category|Category collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \App\Builders\Category|Model companyId($company_id)
 * @method static \App\Builders\Category|Model contact($contacts)
 * @method static \App\Builders\Category|Model dateFilter(string $field)
 * @method static \App\Builders\Category|Model disableCache()
 * @method static \App\Builders\Category|Model disabled()
 * @method static \App\Builders\Category|Model enabled()
 * @method static \App\Builders\Category|Category expense()
 * @method static \Database\Factories\Category factory($count = null, $state = [])
 * @method static \App\Builders\Category|Category getWithoutChildren($columns = [])
 * @method static \App\Builders\Category|Category income()
 * @method static \App\Builders\Category|Model isNotOwner()
 * @method static \App\Builders\Category|Model isNotRecurring()
 * @method static \App\Builders\Category|Model isOwner()
 * @method static \App\Builders\Category|Model isRecurring()
 * @method static \App\Builders\Category|Category item()
 * @method static \App\Builders\Category|Model monthsOfYear(string $field)
 * @method static \App\Builders\Category|Category name($name)
 * @method static \App\Builders\Category|Category newModelQuery()
 * @method static \App\Builders\Category|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category onlyTrashed()
 * @method static \App\Builders\Category|Category other()
 * @method static \App\Builders\Category|Category query()
 * @method static \App\Builders\Category|Model reconciled($value = 1)
 * @method static \App\Builders\Category|Model sortable($defaultParameters = null)
 * @method static \App\Builders\Category|Model source($source)
 * @method static \App\Builders\Category|Category type($types)
 * @method static \App\Builders\Category|Model usingSearchString(?string $string = null)
 * @method static \App\Builders\Category|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \App\Builders\Category|Category withSubCategory()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Currency
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $code
 * @property float $rate
 * @property string $precision
 * @property string $symbol
 * @property string $symbol_first
 * @property string $decimal_mark
 * @property string $thousands_separator
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Banking\Account> $accounts
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Common\Contact> $contacts
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Document\Document> $documents
 * @property-read array $line_actions
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection<int, \App\Models\Banking\Transaction> $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency exists()
 * @method static \Database\Factories\Currency factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency withoutTrashed()
 */
	class Currency extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\EmailTemplate
 *
 * @property int $id
 * @property int $company_id
 * @property string $alias
 * @property string $class
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property string|null $params
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read mixed $group
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate moduleAlias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate withoutTrashed()
 */
	class EmailTemplate extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Setting
 *
 * @property int $id
 * @property int $company_id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting prefix($prefix = 'company')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withoutTrashed()
 */
	class Setting extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Tax
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property float $rate
 * @property string $type
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document\DocumentItemTax> $document_items
 * @property-read array $line_actions
 * @property-read string $title
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Common\ItemTax> $items
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax compound()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model dateFilter(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax exists()
 * @method static \Database\Factories\Tax factory($count = null, $state = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax fixed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax inclusive()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isRecurring()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear(string $field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax normal()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax notRate($rate)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax notWithholding()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax rate($rate)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax type($types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString(?string $string = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax withTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax withholding()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax withoutTrashed()
 */
	class Tax extends \Eloquent {}
}

