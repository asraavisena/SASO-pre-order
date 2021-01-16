import React from 'react';
import Menu from './Menu';

import '../../sass/components/Category.scss'

const Category = (props) => {
    const {
        category,
        menus
    } = props;
    const menu = menus.map((menu, i) =>
        (menu.category_id == category.id) ?
            <Menu
                key={menu.id}
                menu={menu}
            />
            :
            null
    );
    return (
        <div className="category">
            <div className="category-wrapper">
                <div className="category-name">
                   {category.name}
                </div>
                <div className="sliders">
                   {menu}
                </div>
            </div>
        </div>
    );
};

export default Category;