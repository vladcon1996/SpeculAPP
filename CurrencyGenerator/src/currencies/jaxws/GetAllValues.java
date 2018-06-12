package currencies.jaxws;

import javax.xml.bind.annotation.*;

@XmlRootElement(name = "GetAllValues", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "GetAllValues", namespace = "http://currencies/")
public class GetAllValues {

    @XmlElement(name = "arg0", namespace = "")
    private Integer id;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }
}
