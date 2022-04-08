class Box extends React.Component{
    render(){
        return(
            <div className='box'>
                <h1>{this.props.heading}heading</h1>
                <p>this is para using class component</p>
            </div>
        );
    }
};


const App =()=> (
        <div className="row">
            <div className="column">
                <Box heading="first"/>
            </div>
            <div className="column">
                <Box heading="second"/>
            </div>
            <div className="column">
                <Box heading="third"/>
            </div>
            <div className="column">
                <Box heading="forth"/>
            </div>
        </div>
    );


ReactDOM.render(
    <App />,
    document.getElementById('react-container')
);