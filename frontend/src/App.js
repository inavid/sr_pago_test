import React from 'react';
import './App.css';
import { Container, Row, Col } from 'reactstrap';
import Search from './Search/index'
import Map from './Map/index'
import Header from './Header/'
import Results from './Results/'

class App extends React.Component {

  state = {
    infoGasolinas: [],
    center: {
      lat: 19.4179232,
      lng: -99.1505714
    },
    zoom: 14
  }

  onClickSubmitButton = (postalCode) => {
    if(!postalCode) {
      alert("You need to select a postal code");
      return false;
    }
    fetch(`http://localhost/api/external-data/${postalCode}`)
    .then(res => res.json())
    .then((data) => {
      if(data.success) {
        this.setState({
          infoGasolinas: data.results,
          center: {
            lat: parseFloat(data.results[0].latitude),
            lng: parseFloat(data.results[0].longitude)
          }
        })
      }
    })
    .catch(console.log)
  }

  render() {
    return (
      <div className="App">
        <Container>
          <Header />
          <Row>
            <Col xs="6" sm="6">
              <Search 
                onClickSubmitButton={this.onClickSubmitButton}
              />
            </Col>
            <Col xs="6" sm="6">
              <Map 
                infoGasolinas={this.state.infoGasolinas}
                center={this.state.center}
                zoom={this.state.zoom}
              />
            </Col>
          </Row>
          <Row>
            <Col xs="12">
              <Results 
                infoGasolinas={this.state.infoGasolinas} 
              />
            </Col>
          </Row>
        </Container>
      </div>
    );
  }
  
}

export default App;
