import React from 'react';
import Category from '../components/Category'

import '../../sass/components/Content.scss';


const Content = () => {
    const {
        menus,
        categories
    } = window;
    console.log(categories);
    const category = categories.map((cgr) =>
        <Category
            key={cgr.id}
            className="category"
            category={cgr}
            menus={menus}
        />
    );
    return (
        <div className="content">
            {category}
        </div>
    );
};

export default Content;