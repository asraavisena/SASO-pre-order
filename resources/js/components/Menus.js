import React from 'react';
import Menu from './Menu';

import '../../sass/components/Menus.scss'

const Menus = (props) => {
    const {
        category,
    } = props;
    const menu = category.menus.map((menu, i) =>
        (menu.category_id == category.id) ?
            <Menu
                key={menu.id}
                menu={menu}
            />
            :
            null
    );
    return (
        <div className="menus">
            {menu}
        </div>
    );
};

export default Menus;