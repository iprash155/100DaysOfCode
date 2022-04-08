class Heading extends React.Component{
            // functionallity to the element
    state={color:'black'}; // state

    changeColor(changedColor){
        this.setState({color:changedColor})  // changing state 
    };
            // returning an ele
    render(){
        return(
            <div className = 'heading'>
                <h1 className={this.state.color}> this is heading </h1>
                <button onClick = {()=>this.changeColor('red')}> Red </button>
            </div>
        );
    }
}

ReactDOM.render(
    <Heading/>,
    document.getElementById('react-container')
);

