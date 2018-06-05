package currencies.jaxws;

import javax.xml.bind.annotation.*;
import java.util.ArrayList;

@XmlRootElement(name = "GetAllValuesResponse", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "GetAllValuesResponse", namespace = "http://currencies/")
public class GetAllValuesResponse {
    @XmlElement(name = "return", namespace = "")
    private ArrayList<Float> _return;


    public ArrayList<Float> getReturn() {
        return this._return;
    }

    public void setReturn(ArrayList<Float> _return) {
        this._return = _return;
    }
}
