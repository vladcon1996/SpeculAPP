package currencies.jaxws;

import javax.xml.bind.annotation.*;
import java.util.ArrayList;

@XmlRootElement(name = "GetAllLastValuesResponse", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "GetAllLastValuesResponse", namespace = "http://currencies/")
public class GetAllLastValuesResponse {

    @XmlElement(name = "return", namespace = "")
    private ArrayList<Float> _return;

    public ArrayList<Float> getReturn() {
        return this._return;
    }

    public void setReturn(ArrayList<Float> _return) {
        this._return = _return;
    }
}
