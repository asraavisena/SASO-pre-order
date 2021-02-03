import React, { useState } from 'react';
import Category from './Category';
import Selector from './Selector';
import CartContent from './CartContent';
import WhatsAppWidget from './WhatsAppWidget';
import { connect } from 'react-redux';

import '../../sass/components/Content.scss';

const Content = ({hidden}) => {
    const {
        categories
    } = window;
    const [currCategory, setCurrCategory] = useState('');

    //load category depends on selected category
    const category = categories.map((cgr) => {
        if (currCategory === "all" || currCategory==="") {
            return(
                <Category
                    key={cgr.id}
                    className="category"
                    category={cgr}
                />
            )
        } else if (currCategory === cgr.slug) {
            return(
                <Category
                    key={cgr.id}
                    className="category"
                    category={cgr}
                />
            )
        }
        return null;
    });

    //categories section
    const categoriesWrapper = (
        <div className="categories-wrapper">
            <div className="container-option">
                <label>
                    Pilih Kategori:
                </label>
                <Selector
                    label="category"
                    currCategory = {currCategory}
                    onChange={(event) => setCurrCategory(event.target.value)}
                    categories={categories}
                />
            </div>
            {category}
        </div>
    );
    
    return (
        <div className="content main-content">
            {/** add hero banner */}
            {/** add info page */}
            <hr/>
            {
                /* show categories section or cartContent */
                hidden ? categoriesWrapper : <CartContent/>
            }
            {/** WA widgetfor to contact CP */}
            <WhatsAppWidget phoneNumber=""/>
        </div>
    );
};

{/* hidden = cartHidden */}
const mapStateToProps = ({ cart:{ hidden } }) => ({
    hidden
})

export default connect(mapStateToProps)(Content);