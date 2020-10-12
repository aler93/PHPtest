function parseXml(xml, arrayTags) {
  let dom = null;
  if (window.DOMParser) {
    dom = (new DOMParser()).parseFromString(xml, "text/xml");
  } else if (window.ActiveXObject) {
    dom = new ActiveXObject('Microsoft.XMLDOM');
    dom.async = false;
    if (!dom.loadXML(xml)) {
      throw dom.parseError.reason + " " + dom.parseError.srcText;
    }
  } else {
    throw "Erro ao conveter XML!";
  }

  function isArray(o) {
    return Object.prototype.toString.apply(o) === '[object Array]';
  }

  function parseNode(xmlNode, result) {
    if (xmlNode.nodeName === "#text") {
      const v = xmlNode.nodeValue;
      if (v.trim()) {
        result['#text'] = v;
      }
      return;
    }

    let jsonNode = {};
    let existing = result[xmlNode.nodeName];
    if (existing) {
      if (!isArray(existing)) {
        result[xmlNode.nodeName] = [existing, jsonNode];
      } else {
        result[xmlNode.nodeName].push(jsonNode);
      }
    } else {
      if (arrayTags && arrayTags.indexOf(xmlNode.nodeName) !== -1) {
        result[xmlNode.nodeName] = [jsonNode];
      } else {
        result[xmlNode.nodeName] = jsonNode;
      }
    }

    let length;
    if (xmlNode.attributes) {
      length = xmlNode.attributes.length;
      for (let i = 0; i < length; i++) {
        const attribute = xmlNode.attributes[i];
        jsonNode[attribute.nodeName] = attribute.nodeValue;
      }
    }

    length = xmlNode.childNodes.length;
    for (let i = 0; i < length; i++) {
      parseNode(xmlNode.childNodes[i], jsonNode);
    }
  }

  let result = {};
  for (let i = 0; i < dom.childNodes.length; i++) {
    parseNode(dom.childNodes[i], result);
  }

  return result;
}
