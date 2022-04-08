const Box = (props)=>{
    return(
        <div className = 'box'>
            <h1 className= {props.color} >{props.heading} heading </h1>
            <p> this is box which is application state</p>
            <button onClick = {()=>props.changeColor(props.id,'red')}>Red</button>
            <button onClick = {()=>props.changeColor(props.id,'green')}>Green</button>
            <button onClick = {()=>props.changeColor(props.id,'blue')}>Blue</button>
            <button onClick = {()=>props.changeColor(props.id,'yellow')}>Yellow</button>
        </div>
    );
}

class App extends React.Component{
    state = {
        boxes:[
            {   
                id : 1,
                heading : "first",
                color : "black"
            },
            {
                id : 2,
                heading : "second",
                color : "black"
            },
            {
                id : 3,
                heading : "third",
                color : "black"
            },
            {
                id : 4,
                heading : "fourth",
                color : "black"
            },
            {
                id : 5,
                heading : "fifth",
                color : "black"
            },
            {
                id : 6,
                heading : "sixth",
                color : "black"
            },
            {
                id : 7,
                heading : "seventh",
                color : "black"
            },
        ]
    };

    changeColor(id,changedcolor){
        let boxes = this.state.boxes;
        boxes[id-1].color=changedcolor;
        this.setState({boxes:boxes});
    }

    render(){
        return(
            <div className="row">
                    {this.state.boxes.map(box =>
                        <div className="col">
                        <Box 
                            id = {box.id}
                            heading = {box.heading}
                            color = {box.color}
                            changeColor={this.changeColor.bind(this)}
                        />
                        </div>
                    )
                    }  
            </div>
        );
    }
}

ReactDOM.render(
    <App />,
    document.getElementById('react-container')
);