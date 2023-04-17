import './keen-slider.scss';
import register from 'ShopUi/app/registry';
export default register(
    'keen-slider',
    () =>
        import(
            /* webpackMode: "lazy" */
            /* webpackChunkName: "keen-slider" */
            './keen-slider'
        ),
);
