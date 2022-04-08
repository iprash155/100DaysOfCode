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

const Stats = (props)=>{
    let boxes = props.boxes;
    
    let black_count=0,blue_count=0,red_count=0,green_count=0,yellow_count=0;
    
    boxes.forEach(box => {
        if (box.color=="black") {
            black_count++;
        }
        else if (box.color=="red") {
            red_count++;
        }
        else if (box.color=="green") {
            green_count++;
        }    
        else if (box.color=="blue") {
            blue_count++;
        }
        else if (box.color=="yellow") {
            yellow_count++;
        }
    });

    return(
        <div > <span><b>Total heading color count</b></span>
            <div>black : {black_count}</div>
            <div>blue  : {blue_count}</div>
            <div>red   : {red_count}</div>
            <div>yellow: {yellow_count}</div>
            <div>green : {green_count}</div>
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
                <div className="row">         
                            <Stats boxes={this.state.boxes}/>
                </div>
            </div>
        );
    }
}

ReactDOM.render(
    <App />,
    document.getElementById('react-container')
);