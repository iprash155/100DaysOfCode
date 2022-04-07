
function Box() {
    return(
        <div className='box'>
            <h1 id='abc'>this is heading</h1>
            <p>this is paragraph using jsx</p>
        </div>
    );
    
}

ReactDOM.render(
    <Box/>,
    document.getElementById('react-container')
);