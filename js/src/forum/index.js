import { extend } from 'flarum/extend';
import app from 'flarum/app';
import EditUserModal from 'flarum/common/components/EditUserModal';
import Model from 'flarum/common/Model';
import User from 'flarum/common/models/User';
import extractText from 'flarum/common/utils/extractText';
import Button from 'flarum/common/components/Button';

extend(EditUserModal.prototype, 'fields', function (items) {
    items.add('hasbadge',
        <div className="Form-group">
            <label>{app.translator.trans('serakoi-flarumstaffbadge.forum.edit_user.heading')}</label>
            <input className="FormControl"
                placeholder={extractText(app.translator.trans('serakoi-flarumstaffbadge.forum.edit_user.placeholder'))}
                bidi="test" />
        </div>, 100)
});