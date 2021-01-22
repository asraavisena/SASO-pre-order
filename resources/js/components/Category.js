import React from 'react';
import Menus from './Menus'

import '../../sass/components/Category.scss'

const Category = (props) => {
    const {
        category,
    } = props;

    return (
        <div className="category">
            <div className="category-wrapper">
                <div className="category-name">
                   {category.name}
                </div>
                <Menus category={category}/>
            </div>
        </div>
    );
};

export default Category;