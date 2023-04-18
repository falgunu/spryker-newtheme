import { bootstrap } from 'ShopUi/app';
bootstrap();
import { setup, mount } from 'ShopUi/app';
import { log, error } from 'ShopUi/app/logger';

setup();

$(async () => {
    try {
        await mount();
        log('application ready final');
    } catch (err) {
        error('application error\n', err);
    }
});
