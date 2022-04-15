import React from "react";
import FilterBar from "./FilterBar_css";
import FilterModal from "./FilterModal_css";
import NoProperty from "./NoProperty_css";
import PropertyCard from "./PropertyCard_css";

import {base_path} from "./utils.js"

const App = () =>{
    <>
        <div className="page container">
            <FilterBar />
            <PropertyCard />
            <NoProperty/>
        </div>

        <FilterModal />
    </>
}

export default App;