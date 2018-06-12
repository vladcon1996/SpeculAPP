package currencies.jaxws;

import javax.xml.bind.annotation.*;

@XmlRootElement(name = "GetLastValue", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "GetLastValue", namespace = "http://currencies/")
public class GetLastValue {

    @XmlElement(name = "arg0", namespace = "")
    private Integer id;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }
}
