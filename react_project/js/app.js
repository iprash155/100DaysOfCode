class Box extends React.Component{
            // functionallity to the element
    state={color:'black'}; // state

    changeColor(changedColor){
        this.setState({color:changedColor})  // changing state 
    };
            // returning an ele
    render(){
        return(
            <div className = 'box'>
                <h1 className={this.state.color}> {this.props.heading} heading </h1>
                <p>this is para</p>
                <button onClick = {()=>this.changeColor('red')}> Red </button>
                <button onClick = {()=>this.changeColor('green')}> Green </button>
                <button onClick = {()=>this.changeColor('blue')}> BLue </button>
                <button onClick = {()=>this.changeColor('yellow')}> Yellow </button>
            </div>
        );
    }
}

const App = ()=>{
    return(
        <div className="row">
            <div className="col">
                <Box heading="first"/>
            </div>
            <div className="col">
                <Box heading="second"/>
            </div>
            <div className="col">
                <Box heading="third"/>
            </div>
            <div className="col">
                <Box heading="forth"/>
            </div>
            <div className="col">
                <Box heading="fifth"/>
            </div>
            <div className="col">
                <Box heading="sixth"/>
            </div>
        </div>
    );
}

ReactDOM.render(
    <App/>,
    document.getElementById('react-container')
);

