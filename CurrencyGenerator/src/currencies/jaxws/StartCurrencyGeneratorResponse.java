package currencies.jaxws;

import javax.xml.bind.annotation.*;

@XmlRootElement(name = "StartCurrencyGeneratorResponse", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "StartCurrencyGeneratorResponse", namespace = "http://currencies/")
public class StartCurrencyGeneratorResponse {
    @XmlElement(name = "return", namespace = "")
    private Boolean _return;

    public Boolean getReturn() {
        return this._return;
    }

    public void setReturn(Boolean _return) {
        this._return = _return;
    }
}
