<?php

/*
 * This file is part of serakoi/flarumstaffbadge.
 *
 * Copyright (c) 2021 Serakoi.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Serakoi\FlarumStaffBadge;

use Flarum\Extend;
use Flarum\Api\Serializer\ForumSerializer;
use Flarum\Api\Event\Serializing;
use Flarum\User\Event\Saving;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/resources/less/admin.less'),
    new Extend\Locales(__DIR__.'/resources/locale'),

    (new Extend\Event())
        ->listen(Saving::class, SaveStaffBadgeToDatabase::class),
    
    (new Extend\Settings)
        ->default('staffBadge', 'false')
        ->serializeToForum('staffBadgeTitle', 'serakoi-flarumstaffbadge.staffBadge')
        ->serializeToForum('staffBadgeDriver', 'staff_badge_driver', null, 'staffBadge')
];