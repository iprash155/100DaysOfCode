const Box = (props)=>(
        <div className='box'>
            <h1 id='abc'>{props.heading} heading</h1>
            <p>this is paragraph using components</p>
        </div>
    );


const App =()=> (
        <div className="row">
            <div className="column">
                <Box heading="first"/>
            </div>
            <div className="column">
                <Box heading="second"/>
            </div>
        </div>
    );


ReactDOM.render(
    <App />,
    document.getElementById('react-container')
);