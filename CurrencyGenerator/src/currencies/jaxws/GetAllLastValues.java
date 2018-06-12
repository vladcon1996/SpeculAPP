package currencies.jaxws;


import javax.xml.bind.annotation.*;
import java.util.ArrayList;

@XmlRootElement(name = "GetAllLastValues", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "GetAllLastValues", namespace = "http://currencies/")
public class GetAllLastValues {
    @XmlElement(name = "arg0", namespace = "")
    private ArrayList<Integer> idList;

    public ArrayList<Integer> getIdList() {
        return idList;
    }

    public void setIdList(ArrayList<Integer> idList) {
        this.idList = idList;
    }
}
