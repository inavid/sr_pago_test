import React, { Component } from 'react';
import GoogleMapReact from 'google-map-react';
import { Badge } from 'reactstrap';
 
const AnyReactComponent = ({text}) => {
  return(
    <div>
      <Badge color="dark">
        {text}
      </Badge>
    </div>
  )
};
 
class Map extends Component {
  render() {
    return (
      <div style={{ height: '50vh', width: '100%' }}>
        <GoogleMapReact
          bootstrapURLKeys={{ key: "AIzaSyDG1Qrdk6PRv7CS-N88YK-99zO1i-KP-lA" }}
          center={this.props.center}
          zoom={this.props.zoom}
        >
          {
            (this.props.infoGasolinas.length > 0) ?
              this.props.infoGasolinas.map((row)=>{
                return(
                  <AnyReactComponent
                    key={row._id}
                    lat={row.latitude}
                    lng={row.longitude}
                    text={"$ "+row.regular}
                  />
                )
              })
            : null
          }
        </GoogleMapReact>
      </div>
    );
  }
}
 
export default Map;