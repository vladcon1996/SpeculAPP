package currencies.jaxws;

import javax.xml.bind.annotation.*;

@XmlRootElement(name = "GetLastValueResponse", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "GetLastValueResponse", namespace = "http://currencies/")
public class GetLastValueResponse {

    @XmlElement(name = "return", namespace = "")
    private Float _return;


    public Float getReturn() {
        return this._return;
    }

    public void setReturn(Float _return) {
        this._return = _return;
    }

}
