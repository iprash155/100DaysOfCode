import React from "react";
import { base_path } from './utils.js';

const FilterBar = ()=>{
    return(
        <div class="filter-bar row justify-content-around">
            <div class="col-auto" data-toggle="modal" data-target="#filter-modal">
                <img src={base_path+"img/filter.png"} alt="filter" />
                <span>Filter</span>
            </div>
            <div class="col-auto">
                <img src={base_path+"img/desc.png"} alt="sort-desc" />
                <span>Highest rent first</span>
            </div>
            <div class="col-auto">
                <img src={base_path+"img/asc.png"} alt="sort-asc" />
                <span>Lowest rent first</span>
            </div>
        </div>
    );
}

export default FilterBar;