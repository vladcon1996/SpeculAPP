package currencies.jaxws;


import javax.xml.bind.annotation.*;

@XmlRootElement(name = "StartCurrencyGenerator", namespace = "http://currencies/")
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "StartCurrencyGenerator", namespace = "http://currencies/")
public class StartCurrencyGenerator {

    @XmlElement(name = "arg0", namespace = "")
    private String currency;

    @XmlElement(name = "arg1", namespace = "")
    private Float intervalBg;

    @XmlElement(name = "arg2", namespace = "")
    private Float intervalEnd;

    @XmlElement(name = "arg3", namespace = "")
    private Integer time;

    public String getCurrency() {
        return currency;
    }

    public void setCurrency(String currency) {
        this.currency = currency;
    }

    public Float getIntervalBg() {
        return intervalBg;
    }

    public void setIntervalBg(Float intervalBg) {
        this.intervalBg = intervalBg;
    }

    public Float getIntervalEnd() {
        return intervalEnd;
    }

    public void setIntervalEnd(Float intervalEnd) {
        this.intervalEnd = intervalEnd;
    }

    public Integer getTime() {
        return time;
    }

    public void setTime(Integer time) {
        this.time = time;
    }
}
