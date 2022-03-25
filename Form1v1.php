<!DOCTYPE html>
<html lang="en">

<title>Demostration of Forms in React</title>
<script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src= "https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
<body>

<h1> Demostration of Forms in React</h1>
<div id="root"></div>

<script type="text/babel">

class NameForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {value: ''};
	//this.state = {value: 'Your Name Please'};

	//binding so that 'this' can be used in the callback
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(event) {
    //this.setState({value: event.target.value.toUpperCase()});
	this.setState({value: event.target.value});
  }

//without .preventDefault() the submitted form would be refreshed
  handleSubmit(event) {
	//alert shows up without the page being refreshed showing the state value that was entered
    alert('The submitted name is: ' + this.state.value);
    event.preventDefault();
  }

  render() {
    return (
	//a form with the handler created before to handle the state
	/*handler also created before to handle the state 
	  this.state.value makes the react state the single source of truth
	  handleChange runs on every keystroke to update react state and so the displayed value will be updated
	  as the user types*/ 
      <form onSubmit={this.handleSubmit}>
        <label>
          Name:
		  
          <input type="text" value={this.state.value} onChange={this.handleChange} />
        </label>
        <input type="submit" value="Submit" />
      </form>	  
    );
  }
}

ReactDOM.render(
  <NameForm />,
  document.getElementById('root')
);


</script>

</body>
</html>
