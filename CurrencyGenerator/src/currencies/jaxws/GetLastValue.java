package currencies.jaxws;

import javax.xml.bind.annotation.*;

@XmlRootElement(name = "GetLastValue", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "GetLastValue", namespace = "http://currencies/")
public class GetLastValue {

    @XmlElement(name = "arg0", namespace = "")
    private String currency;

    public String getCurrency() {
        return currency;
    }

    public void setCurrency(String currency) {
        this.currency = currency;
    }
}
